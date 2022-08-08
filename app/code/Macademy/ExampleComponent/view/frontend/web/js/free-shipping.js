define(['uiComponent', 'Magento_Customer/js/customer-data', 'underscore', 'ko'], function(Component, customerData, _, ko){
'use strict'

return Component.extend({
defaults: {
template: 'Macademy_ExampleComponent/free-shipping',
subtotal: 0.00,
tracks: {
subtotal: true
}
},
initialize: function(){
this._super();

var self = this;

console.log("The component has been loaded successfully");

var cart = customerData.get('cart');

customerData.getInitCustomerData().done(function(){
console.log(cart());
if (!_.isUndefined(cart()) && !_.isEmpty(cart())){
self.subtotal = parseFloat(cart().subtotalAmount);
}
})

cart.subscribe(function(){
if (!_.isUndefined(cart()) && !_.isEmpty(cart())){
self.subtotal = parseFloat(cart().subtotalAmount);
}
})

self.message = ko.computed(function(){
if (self.subtotal === 0 || _.isUndefined(self.subtotal)){
return self.defaultMessage;
}

if (self.subtotal > 0 && self.subtotal < 100){
var remainingTotal = 100 - self.subtotal;
var formattedRemainingTotal = self.formatCurrency(remainingTotal);
return self.itemsInCartMessage.replace('$XX.XX', formattedRemainingTotal); 
}

if (self.subtotal >= 100){
return self.freeShippingMessage;
}
})

},
formatCurrency: function(value){
return '$' + value.toFixed(2);
}
})
})
