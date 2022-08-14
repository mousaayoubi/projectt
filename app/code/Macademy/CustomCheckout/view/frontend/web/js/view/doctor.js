define([
'uiComponent',
'Magento_Checkout/js/model/step-navigator',
'mage/translate',
'ko',
'underscore',
], function(Component, stepNavigator, $t, ko, _){
'use strict';

return Component.extend({
defaults: {
template: 'Macademy_CustomCheckout/doctor',
isVisible: ko.observable(false),
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
