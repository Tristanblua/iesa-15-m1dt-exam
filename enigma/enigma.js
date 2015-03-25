function Enigma()  {
	// var decryptedChars = Array(
	// 	"a", "b", "c", "d", "e", "f", "g",
	// 	"h", "i", "j", "k", "l", "m", "n",
	// 	"o", "p", "q", "r", "s", "t", "u",
	// 	"v", "w", "x", "y", "z", " ", "'",
	// 	".", ",", ":", ";"
	// 	);

	// var encryptedChars = Array(
	// 	"j", "d", "w", "o", "v", "a", "r",
	// 	"i", "g", " ", "x", "u", "n", "s",
	// 	"y", "q", "c", "p", "'", "f", "m", 
	// 	"z", "t", "k", "h", "b", "e", "l",
	// 	".", ",", ":", ";"
	// 	);

	// var uncrypter = Array (
	// 	"a" : "j", "b" : "d", "c" : "w",
	// 	"d" : "o", "e" : "v", "f" : "a",
	// 	"g" : "r", "h" : "i", "i" : "g",
	// 	"j" : " ", "k" : "x", "l" : "u",
	// 	"m" : "n", "n" : "s", "o" : "y",
	// 	"p" : "q", "q" : "c", "r" : "p",
	// 	"s" : "'", "t" : "f", "u" : "m",
	// 	"v" : "z", "w" : "t", "x" : "k",
	// 	"y" : "h", "z" : "b", " " : "e",
	// 	"'" : "l", "." : ".", "," : ",",
	// 	":" : ":", ";" : ";"
	// );

	function test(str) { 
  		var decryptedChars = new Array(
		"a", "b", "c", "d", "e", "f", "g",
		"h", "i", "j", "k", "l", "m", "n",
		"o", "p", "q", "r", "s", "t", "u",
		"v", "w", "x", "y", "z", " ", "'",
		".", ",", ":", ";"
		); 
  		var encryptedChars = new Array(
		"j", "d", "w", "o", "v", "a", "r",
		"i", "g", " ", "x", "u", "n", "s",
		"y", "q", "c", "p", "'", "f", "m", 
		"z", "t", "k", "h", "b", "e", "l",
		".", ",", ":", ";"
		); 
  		for (var i=0; i<decryptedChars.length; i++) { 
     		str = str.replace(decryptedChars[i], encryptedChars[i]); 
  		} 
  		return str; 
  		console.log(str);
	}
	
}