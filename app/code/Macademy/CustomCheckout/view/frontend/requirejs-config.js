var config = {
deps: [
'Macademy_CustomCheckout/js/mask-input-telephone'
],
config: {
mixins: {
'Magento_Checkout/js/action/set-shipping-information':
{
'Macademy_CustomCheckout/js/action/set-shipping-information-mixin': true
},
'Magento_Checkout/js/view/billing-address':
{
'Macademy_CustomCheckout/js/view/billing-address-mixin': true
}
}
}
}
