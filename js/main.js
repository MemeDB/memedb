toggled = new Array();

function load() {
	console.log("load");
	buttons = document.querySelectorAll(".library");
	for (i = 0; i < buttons.length; i++) {
		buttons[i].id = i.toString();
		buttons[i].onclick = function() {
			console.log(this.id);
			if(toggled[this.id]) {
				this.children[1].style.transform = "";
				this.nextElementSibling.style.height = "0px";
			} else {
				this.children[1].style.transform = "rotate(180deg)";
				content = this.nextElementSibling;
				content.style.height = "";
				height = content.clientHeight;
				content.style.height = "0px";
				setTimeout(function() {
					content.style.height = height.toString() + "px";
				}, 10);
			}
			toggled[this.id] = !toggled[this.id];
    };
  }
};

function showError(message) {
	bg = document.getElementById("imp-bg-fade");
	msg = document.getElementById("imp-message");

	bg.style.display = "";
	msg.style.display = "";

	setTimeout(function() {
		bg.style.opacity = "";
		msg.style.opacity = "";
	}, 10);

	document.querySelectorAll(".imp-message .imp-p")[0].innerHTML = message;
}
