define([
'uiComponent',
'ko',
'Magento_Customer/js/customer-data',
'Magento_Customer/js/model/customer',
], function(Component, ko, customerData, customer){
'use strict';

return Component.extend({
defaults: {
isVisible: ko.observable(customer.isLoggedIn()),
fname: 'hi world',
},
initialize: function(){
this._super();
this.customer = customerData.get('customer');
console.log('The banner component has been loaded successfully.');
console.log('Customer logged in: ' + this.isVisible());
console.log('Customer First Name: ' + this.firstname());
},
firstname: function(){
var customerInfo = customerData.get('customer')();
var customerFirstName = customerInfo.firstname;
return customerFirstName;
},
})
})
