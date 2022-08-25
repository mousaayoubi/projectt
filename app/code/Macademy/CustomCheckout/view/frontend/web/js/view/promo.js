define([
'uiComponent',
'ko',
'Magento_Checkout/js/model/quote',
], function(Component, quote){
'use strict';

return Component.extend({
defaults: {
total: '$100',
},
initialize: function(){
this._super();
console.log('The promo component has been loaded successfully.');
},
grandTotal: function(){
return '$100';
},
})
})
