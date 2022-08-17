define([
'uiComponent',
'ko',
'Magento_Customer/js/model/customer',
], function(Component, ko, customer){
'use strict';

return Component.extend({
defaults: {
isVisible: ko.observable(customer.isLoggedIn()),
},
initialize: function(){
this._super();
console.log('The banner component has been loaded successfully.');
console.log('Customer logged in: ' + this.isVisible());
},
})
})
