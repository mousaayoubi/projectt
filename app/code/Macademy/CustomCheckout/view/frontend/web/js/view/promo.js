define([
'uiComponent',
'ko',
'Magento_Customer/js/customer-data',
'underscore',
], function(Component, ko, customerData, _){
'use strict';

return Component.extend({
defaults: {
isVisible: ko.observable(true),
threshold: 100,
subtotal: 0.00,
tracks: {
subtotal: true,
isVisible: true,
},
},
initialize: function(){
this._super();
console.log('The promo component has been loaded successfully.');

var self = this;

var cart = customerData.get('cart');

customerData.getInitCustomerData().done(function(){
if (!_.isEmpty(cart()) && !_.isUndefined(cart().subtotalAmount)){
self.subtotal = parseFloat(cart().subtotalAmount);
}
});

cart.subscribe(function(cart){
if (!_.isEmpty(cart) && !_.isUndefined(cart.subtotalAmount)){
self.subtotal = parseFloat(cart.subtotalAmount);
console.log(self.subtotal);
}
});

self.message = ko.computed(function(){
if (self.subtotal === 0){
return '$100';
}

if (self.subtotal > 100){
return '$0.00'
}

if (self.subtotal > 0 && self.subtotal < self.threshold){
var remaining = self.threshold - self.subtotal;
return self.formatCurrency(remaining);
}
})
},
isVisible: function(){
if (self.subtotal > 100){
return this.isVisible(false);
}
},
formatCurrency: function(value){
return '$' + value.toFixed(2);
},
})
})
