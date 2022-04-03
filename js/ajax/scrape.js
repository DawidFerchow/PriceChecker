// script should be run only on 'scrape' page
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const page = urlParams.get('page');

if (page == 'scrape') {
  // must change this
  var allTables = getAllTablesIDs();
}

// check if and which table is displayed
function getAllTablesIDs() {
  let i = 0;
  let length = $('table').length;
  const allTables = [];

  do {
    allTables.push($('table')[i].id);
    i = i + 1;
  } while (i < length);

  return allTables;
}

// If table is displayed, hidden it.
function removeDataTables(table) {
  const index = allTables.indexOf(table);
  if (index > -1) {
    allTables.splice(index, 1);
  }

  for (const element of allTables) {
    if ( $.fn.DataTable.isDataTable( '#'+element ) ) {
      const table = $('#'+element).dataTable()
      $(table).DataTable().destroy();
      $(table).css("display", "none");
    }
  }
  $('#logView').css("display", "none");
}

// if user select which content will update, make proper table
function rivalOrProduct(table) {

  if (table === 'products') {

    // if user first selects another table and then this one, I have to delete the previous one
    removeDataTables(allTables);

    const dataTables = $('#products').DataTable( {
      serverMethod: 'post',
      ajax: {
        url: './php/scrape/generateDataTables.php',
        data: {
          from: 'products'
        },
        dataSrc: ''
      },
      columns: [
        { defaultContent: '', className: "select-checkbox", orderable: false },
        { data: 'id'},
        { data: 'sku'},
        { data: 'name'},
        { data: 'rec_price', className: "has-text-right has-money", render: DataTable.render.number( '', '.', 2, '' )},
        { data: 'min_cur_price', className: "has-text-right has-money", render: DataTable.render.number( '', '.', 2, '' )},
        { data: 'update_date'}
      ],
      select: {
        style:    'os',
        selector: 'td:first-child'
      },
      order: [[ 1, 'asc' ]],
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'selected',
          text: 'Uruchom aktualizację cen',
          action: function( e, dt, button, config ) {
//          console.log("getRowsAndScrapeIt "+table);
            getRowsAndScrapeIt(dataTables);
          }
        },
        {
          extend: 'selectNone',
          text: 'Odznacz'
        }
      ],
    } );
    // default boilerplate of this table is hidden with display: none value
    dataTables.columns.adjust().draw();
    $("#"+table).css("display", "table");


  }

  if (table === 'rivals') {
    let allTables = getAllTablesIDs();
    // if user first selects another table and then this one, I have to delete the previous one
    removeDataTables(allTables);

    const dataTables = $('#rivals').DataTable( {
      "serverMethod": 'post',
      ajax: {
        url: 'php/scrape/generateDataTables.php',
        data: {
          from: 'rivals'
        },
        dataSrc: ''
      },
      columns: [
        { defaultContent: '', className: "select-checkbox", orderable: false, width: "5%", },
        { data: 'id' , width: "5%",},
        { data: 'name' }
       ],
      select: {
        style:    'os',
        selector: 'td:first-child'
       },
      order: [[ 1, 'asc' ]],
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'selected',
          text: 'Uruchom aktualizację cen',
          action: function( e, dt, button, config ) {
            getRowsAndScrapeIt(dataTables);
          }
        },
        {
          extend: 'selectNone',
          text: 'Odznacz'
        }
      ],
    } );

    // default boilerplate of this table is hidden with display: none value
    dataTables.columns.adjust().draw();
    $('#'+table).css("display", "table");


  }

  // remove all instance of datatable
  if (table === 'reset') {
    removeDataTables(allTables);
  }

}

// Because it's server side script, we wanted see what actually happens..
// ..so, show content of logfile
function getLog(){

  const log = $.ajax({
    url: './php/scrape/logfile.txt',
    dataType: 'text',
    cache: false,  // with this, force the browser to not make cache of the retrieved data
    success: function(text) {
      $("#containerDiv").html(text);
      const newmsg_top = parseInt($('#containerDiv')[0].scrollHeight );
      $('#containerDiv').scrollTop(newmsg_top);
      setTimeout(getLog, 5000); // refresh every 5 seconds
    }
  });

}

// simple clear log, php file containts fopen('logfile.txt','w');
$("#clearLog").click(function() {
  const logRefresh = $.ajax({
    type: 'POST',
      url: './php/scrape/clearLog.php',
      beforeSend: function() {
        $("#clearLog").addClass('is-loading');
      },
      success: function(message) {
        setTimeout(function(){
          $("#clearLog").removeClass('is-loading')
        }, 5000);
      },
      error: function (message) {

      }
  });
});

// time for magic..
function getRowsAndScrapeIt(dataTables) {

  // get selected rows with dataTables method
  const rows = dataTables.rows( { selected: true } ).data();
  // prepare variable for do-while loop
  let length = rows.length;
  let i = 0;
  const ids = [];
  // push selected rows to object
  do {
     ids.push(Object.values(rows[i])[0]);
     i = i + 1;
  } while (i < length);
  // get info which table get selected rows
  let tableID = dataTables.table().node().id;
  // send selected rows and info which one table from to
  // script which one will prepare proper URL ID and URL
  const xhr = $.ajax({
    type: 'POST',
    url: './php/scrape/getURLsForScrape.php',
    data: {
      from: tableID,
      ids: ids
    },
    cache: false,
    beforeSend: function () {
    },
    // if ajax callback is success we get proper URL ID and URL
    // in json format so we can scrape it :)
    success: function(message) {
    const currentRequest = $.ajax({
        type: 'POST',
        url: './php/scrape/autoScrape.php',
        data: {
          data: message,
          ids: ids
        },
        // we want know what is going on so hidden table
        // and show log file
        beforeSend: function (message2) {
          removeDataTables(allTables);
          $('#logView').css("display", "block");
          getLog();
        },
        // after scrape URL stoped refresh log file
        success: function (message2) {
          console.log(message2);
          getLog.abort();
        },
        error: function (message2) {
        }
      });
      // we also want to be able cancel scrape
      // Can stop ajax request if it is variable
      $("#stopAutoScrape").click(function() {
          currentRequest.abort();
      });

    },
    error: function (message) {
    }

  });
}
