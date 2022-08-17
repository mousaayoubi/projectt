define([
'Magento_Checkout/js/view/summary/cart-items'
], function(Component){
'use strict';

return Component.extend({
defaults: {
template: 'Macademy_CustomCheckout/summary/cart-items',
},
isItemsBlockExpanded: function(){
return true;
},
})
})
