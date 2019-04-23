var userAccount = [
	{
		username: "dummy",
		password: "dummy",
		userType: 1
	},
	{
		username: "test",
		password: "test",
		userType: 1
	},
	{
		username: "admin",
		password: "admin",
		type		: 2
	}
]

$("#loginBtn").click(function() {
	var username = document.getElementById("loginUser").value;
	var password = document.getElementById("loginPw").value;

	var login = 0;
	// return the user type if successfully logged in
	// 0: failed, 1: medical expert, 2: record manager

	// dummy account value for debug
	for (i = 0; i < userAccount.length;i++) {
		if (username == userAccount[i].username && password == userAccount[i].password) {
			login = userAccount[i].userType;
		}
	}

	if (login == 0) {  // pop up error message
		$("#loginFail").modal();
	} else if (login == 1) {
		window.location.href = "home_me.html";
		console.log(userType);
	} else {
		window.location.href = "home_rm.html";
	}
});

function updateRule() {
	// Requiring fs module in which 
	// writeFile function is defined. 
	const fs = require('fs')
  
	// Data which will write in a file. 
	let data = document.getElementById("medicalRule").value
  
	// Write data in 'rules.txt' . 
	fs.writeFile('rules.txt', data, (err) => { 
 
    // In case of a error throw err. 
    if (err) throw err;
  }) 
}

$(function () {
  $('[data-toggle="popover"]').popover()
});