var config = {
deps: [
'Macademy_CustomCheckout/js/mask-input-telephone'
],
config: {
mixins: {
'Magento_Checkout/js/action/set-shipping-information':
{
'Macademy_CustomCheckout/js/action/set-shipping-information-mixin': true
}
}
},
}
