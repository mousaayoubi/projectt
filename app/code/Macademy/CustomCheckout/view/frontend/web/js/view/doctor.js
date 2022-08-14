define([
'uiComponent',
'Magento_Checkout/js/model/step-navigator',
'mage/translate',
'ko',
'underscore',
'Magento_Checkout/js/model/quote',
], function(Component, stepNavigator, $t, ko, _, quote){
'use strict';

return Component.extend({
defaults: {
template: 'Macademy_CustomCheckout/doctor',
isVisible: ko.observable(false),
quoteIsVirtual: quote.isVirtual(),
},
initialize: function(){
this._super();
console.log('The doctor component has been loaded successfully.');
stepNavigator.registerStep('doctor', null, $t('Doctor Info'), this.isVisible, _.bind(this.navigate, this), this.sortOrder);
},
navigate: function(){
return this.isVisible(true);
},
onSubmit: function(){
return stepNavigator.next();
}
})
})
