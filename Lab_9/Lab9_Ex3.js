function MyFunc() {
	this.dilim = " ?!.,()-+@#$%^&*";

	this.split = (string) =>{//tach chuoi ban dau thanh mang cac word
		var s = [];
		var len = 0;
		var str = this.trim(string);
		var start = 0;
		var end = start;
		while(end < str.length) {
			s[len] = "";
			while(end < str.length && this.contains(this.dilim, str.charAt(end)) === 0)
				end++;
			for(var j = start; j < end; j++) {
				s[len] += "" + str.charAt(j);
			}
			len++;
			while(end < str.length && this.contains(this.dilim, str.charAt(end)) === 1)
				end++;
			start = end;
		}
	return s;
	}
	this.trim = (string) =>{//cat khoang trang o dau va cuoi chuoi
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
	this.reverse = (string) =>{//tra ve mang cac word trong chuoi nhap vao theo thu tu dao nguoc
		var arr = this.split(string);
		var s = [];
		var len = 0;
		for(var i = arr.length - 1; i >= 0; i--) {
			s[len] = arr[i];
			len++;
		}
		return s;
	}
	this.contains = function(string1, string2){//kiem tra xem chuoi mot co chua chuoi hai hay khong?
		//co chua tra ve 1, khong chua tra ve 0
		var len1 = string1.length;
		var len2 = string2.length;
		if(len2 > len1) 
			return 0;
		for(var i = 0; i < len1; i++) {//do length nho nen O(n^2) cung nho
			var count = 0;
			for(var j = 0; j < len2; j++) {
				if(string1.charAt(i) === string2.charAt(j))
					count++;
				else {
					count = 0; 
					break;
				}
			}
			if(count === len2)
				return 1;
		}
		return 0;
	};
	this.containsIgnoreCase = function(string1, string2) {
		//co chua tra ve 1, khong chua tra ve 0
		var len1 = string1.length;
		var len2 = string2.length;
		if(len2 > len1) 
			return 0;
		for(var i = 0; i < len1; i++) {//do length nho nen O(n^2) cung nho
			var count = 0;
			for(var j = 0; j < len2; j++) {
				var c1 = string1.charCodeAt(i + j);
				var c2 = string2.charCodeAt(j);
				if(c1 === c2 || c1 - 65 === c2 - 97 || c1 - 97 === c2 - 65) {
					count++;
				}
				else {
					count = 0; 
					break;
				}
			}
			if(count === len2)
				return 1;
		}
		return 0;
	}
	this.filter = (string, filter) =>{//loc cac tu co chua filter khoi string da duoc dao nguoc tu chuoi ban dau
		if(this.containsIgnoreCase(string, filter) === 0 || filter === "") {//kiem tra xem cau nguoi dung nhap vao co chua filter hay khong
			return null;
		}
		var s = this.reverse(string);
		var result = [];
		var len = 0;
		for(var i = 0; i < s.length; i++) {
			if(this.containsIgnoreCase(s[i], filter) === 0)
				result[len++] = s[i];
		}
		return result;
	}
}

function lab9_ex3a() {
	var myFunc = new MyFunc();
	var phrase = document.getElementById('phrase').value;
	var result = document.getElementById('result');
	result.innerHTML = "";
	var s = myFunc.reverse(phrase);
	for(index = 0; index < s.length; index++) {
		if(index % 2 === 0) {
			result.innerHTML += "<div class='word_odd'><u>" + s[index] + "</u></div>";
		}
		else result.innerHTML += "<div class='word_even'>" + s[index] + "</div>";
	}
}
function lab9_ex3b() {
	var myFunc = new MyFunc();
	var phrase = document.getElementById('phrase').value;
	var filter = document.getElementById('filter').value;
	var result = document.getElementById('result');
	var count  = document.getElementById('count');
	result.innerHTML = "";
	count.innerHTML = "";
	var sFilter = myFunc.filter(phrase, filter);
	if(sFilter == null) {
		result.innerHTML = phrase;
		count.innerHTML = "0 words filtered out!";
	} else {
		var s = myFunc.reverse(phrase);
		count.innerHTML = "" + (s.length - sFilter.length) + " words filtered out!";
		for(index = 0; index < sFilter.length; index++) {
			if(index % 2 === 0) {
				result.innerHTML += "<div class='word_odd'><u>" + sFilter[index] + "</u></div>";
			}
			else result.innerHTML += "<div class='word_even'>" + sFilter[index] + "</div>";
		}
	}
}