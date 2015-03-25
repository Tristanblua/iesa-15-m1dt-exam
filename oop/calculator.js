function Calculator(nbr) {
	this.result = 0;

	this.add = function (a) {
		this.result += a;
	};

	this.minus = function (a) {
		this.result -= a;
	}
}
