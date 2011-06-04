
// Watches the input/textarea, polling at an interval and runs
// a callback function if anything has changed.
var InputPoller = function (textarea, callback, interval) {
	var scanDelay = Math.max(interval, 500); //don't allow updates faster than every half second
	
	var self = this;
	
	// Stored start, end and text.  Used to see if there are changes to the input.
	var lastStart;
	var lastEnd;
	var lastContents;

	var timeoutHandle; // Used to cancel monitoring on destruction.	
	
	this.hasChanged = function () {
		// Update the selection start and end, text.
		if (lastContents != textarea.value) {
			lastContents = textarea.value;
			return true;
		}
		return false;
	};


	this.checkForUpdate = function () {
		if (util.isVisible(textarea)) { //only update if the textarea/input is visible	
			if (self.hasChanged()) callback();
		}
		
		timeoutHandle = window.setTimeout(self.checkForUpdate, scanDelay);
	};
	
	this.resetTimeout = function () {
		window.clearTimeout(timeoutHandle);
		timeoutHandle = window.setTimeout(self.checkForUpdate, scanDelay);
	};
	
	util.addEvent(textarea, "input",  this.checkForUpdate);
	util.addEvent(textarea, "paste",  this.checkForUpdate);
	util.addEvent(textarea, "drop",	  this.checkForUpdate);
	util.addEvent(textarea, "keyup",  this.checkForUpdate);
	util.addEvent(textarea, "change", this.checkForUpdate);
	
	this.checkForUpdate();

};