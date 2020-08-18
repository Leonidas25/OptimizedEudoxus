function getDepartments(num) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_departments.php",
		dataType: "json",
		data: {"id": num},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getSemesters(num) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_semesters.php",
		dataType: "json",
		data: {"id": num},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getCourses(dep, sem) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_courses.php",
		dataType: "json",
		data: {"dep": dep, "sem": sem},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

function getBooks(num, dep, sem) {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "get_books.php",
		dataType: "json",
		data: {"id": num, "dep": dep, "sem": sem},


		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}

// function set_vars(sem, isbn) {
// 	var container = document.getElementById("appBtn");

// 	jQuery.ajax({
// 		type: "POST",
// 		url: "set_vars.php",
// 		dataType: "json",
// 		data: {"sem": sem, "isbn":isbn},
// 	});
// }


	$('#appBtn').click(function(){
		$.ajax({
			url:"set_vars.php",
			method:"POST",
			data:$('#bookOptions').serialize()
		});
	});


function apply() {
	var container = document.getElementById("results");

	jQuery.ajax({
		type: "POST",
		url: "aply.php",
		dataType: "json",
		data: {},

		success: function(obj, textstatus) {
			console.log(obj);
			container.innerHTML = obj.result;
		}
	});
}