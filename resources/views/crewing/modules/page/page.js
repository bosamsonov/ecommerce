var App = {
	init: function(controller, action) {
		if (typeof this.actions[controller] !== 'undefined' && typeof this.actions[controller][action] !== 'undefined') {
			return App.actions[controller][action]();
		}
	},
	// Controller-action methods
	actions: {
		controllerName: {
			actionName: function() {
				// Do something here
			}
		}
	}
}

window.App = App;

module.exports = App;