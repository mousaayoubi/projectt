define([
'uiComponent',
'ko',
'Magento_Checkout/js/model/step-navigator',
'mage/translate',
'underscore',
'Magento_Checkout/js/model/quote',
'Magento_Customer/js/model/customer',
'jquery',
], function(Component, ko, stepNavigator, $t, _, quote, customer, $){
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
if (this.validateEmail()){
return stepNavigator.next();
}
},
validateEmail: function(){
const loginFormSelector = 'form[data-role=email-with-possible-login]';
let emailValidationResult = customer.isLoggedIn();

if (!customer.isLoggedIn()){
$(loginFormSelector).validation();
emailValidationResult = Boolean($(loginFormSelector + ' input[name=username]').valid());
}

return emailValidationResult;

},
})
})
