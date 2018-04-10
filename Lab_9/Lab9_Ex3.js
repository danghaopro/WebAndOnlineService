function MyFunc() {
	this.split = function(string) {
		var s = [];
		var len = 0;
		var str = this.trim(string);
		var start = 0;
		var end = start;
		while(end < str.length) {
			s[len] = "";
			while(end < str.length && str.charAt(end) != ' ')
				end++;
			for(var j = start; j < end; j++) {
				s[len] += "" + str.charAt(j);
			}
			len++;
			while(end < str.length && str.charAt(end) === ' ')
				end++;
			start = end;
		}
	return s;
	}
	this.trim = function(string) {
		var start = 0;
		var end = string.length;
		var result = "";
		while(string.charAt(start) === ' ')
			start++;
		while(string.charAt(end - 1) === ' ')
			end--;
		for(var i = start; i < end; i++)
			result += string.charAt(i);
		return result;
	}
	this.reverse = function(string) {
		var arr = this.split(string);
		var s = [];
		var len = 0;
		for(var i = arr.length - 1; i >= 0; i--) {
			s[len] = arr[i];
			len++;
		}
		return s;
	}
}

function lab9_ex3a() {
	var myFunc = new MyFunc();
	var phrase = document.getElementById('phrase').value;
	var result = document.getElementById('result');
	var s = myFunc.reverse(phrase);
	for(index = 0; index < s.length; index++) {
		if(index % 2 === 0) {
			result.innerHTML += "<div class='word_odd'><u>" + s[index] + "</u></div>";
		}
		else result.innerHTML += "<div class='word_even'>" + s[index] + "</div>";
	}
	document.getElementById('phrase').value = "";
}