class BulmaModal {
	constructor(selector) {
		this.elem = document.querySelector(selector)
		this.close_data()
	}

	show() {
		this.elem.classList.toggle('is-active')
		this.on_show()
	}

	close() {
		this.elem.classList.toggle('is-active')
		this.on_close()
	}

	close_data() {
		var modalClose = this.elem.querySelectorAll("[data-bulma-modal='close'], .modal-background")
		var that = this
		modalClose.forEach(function(e) {
			e.addEventListener("click", function() {

				that.elem.classList.toggle('is-active')

				var event = new Event('modal:close')

				that.elem.dispatchEvent(event);
			})
		})
	}

	on_show() {
		var event = new Event('modal:show')

		this.elem.dispatchEvent(event);
	}

	on_close() {
		var event = new Event('modal:close')

		this.elem.dispatchEvent(event);
	}

	addEventListener(event, callback) {
		this.elem.addEventListener(event, callback)
	}
}

/*
if (document.querySelector("#removeProductModalButton") !== null) {

var removeProductModalButton = document.querySelector("#removeProductModalButton")
var removeProductModal = new BulmaModal("#removeProductModal")

removeProductModalButton.addEventListener("click", function () {
	removeProductModal.show()
})

}
*/


//if (document.querySelectorAll(".removeURL") !== null) {

if (document.querySelectorAll(".removeURL").length !== 0) {

const $coins = document.querySelectorAll(".removeURL")
var mdl = new BulmaModal("#removeURLmodal")

$coins.forEach($coin => $coin.addEventListener('click', handleDragStart));

function handleDragStart () {
	mdl.show();
	event.preventDefault();
 	var redirectValue = $(this).attr("data-urlid")
	$("#removeURL").attr("data-urlid", redirectValue)
	}

/*
btn.addEventListener("click", function () {
	mdl.show();
	event.preventDefault();
 	var redirectValue = $(this).attr("data-urlid")
	$("#removeURL").attr("data-urlid", redirectValue)
	});
*/

}