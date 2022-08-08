define([
'uiComponent',
'ko',
], function(Component, ko){
'use strict';

return Component.extend({
defaults: {
hiWorld: ko.observable('hi world'),
},
initialize: function(){
this._super();
console.log('The hi world component has been loaded successfully.');
},
onClick: function(){
this.hiWorld('hi world button clicked.');
console.log('The hi world component submit button has been clicked.');
},
})
})
