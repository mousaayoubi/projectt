define([
'uiComponent',
'ko',
'Magento_Checkout/js/model/step-navigator',
'mage/translate',
'underscore',
'Magento_Checkout/js/model/quote',
'Magento_Customer/js/model/customer',
'jquery',
'Magento_Checkout/js/model/customer-email-validator',
], function(Component, ko, stepNavigator, $t, _, quote, customer, $, customerEmailValidator){
'use strict';

return Component.extend({
defaults: {
template: 'Macademy_CustomCheckout/email',
isVisible: ko.observable(false),
},
quoteIsVirtual: quote.isVirtual(),
initialize: function(){
this._super();
console.log('The email component has been loaded successfully.');
stepNavigator.registerStep('email', null, $t('Email'), this.isVisible, _.bind(this.navigate, this), this.sortOrder);

return this;
},
navigate: function(){
return this.isVisible(true);
},
onSubmit: function(){
if (customerEmailValidator.validate()){
return stepNavigator.next();
}
},
})
})
