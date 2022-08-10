define([
'uiComponent',
'ko',
'Magento_Checkout/js/model/step-navigator',
'mage/translate',
'underscore',
'Magento_Checkout/js/model/quote',
], function(Component, ko, stepNavigator, $t, _, quote){
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
return stepNavigator.next();
},
})
})
