define([
'uiComponent',
'ko',
'Macademy_InventoryFulfillment/js/model/skuModel',
'Macademy_InventoryFulfillment/js/model/boxModel',
'mage/url',
'mage/storage',
], function(Component, ko, skuModel, boxModel, url, storage){
'use strict';

return Component.extend({
defaults: {
totalNumberOfBoxes: boxModel.totalNumberOfBoxes(),
totalShipmentWeight: boxModel.totalShipmentWeight(),
totalBillableWeight: boxModel.totalBillableWeight(),
isChecked: ko.observable(false),
isSuccessBoxModel: boxModel.isSuccess,
boxConfigurations: boxModel.boxConfigurations,
sku: skuModel.sku,
},
initialize: function(){
this._super();
console.log('The review component has been loaded successfully.');
this.isEnabled = ko.computed(() => {
return skuModel.isSuccess() && boxModel.isSuccess() && this.isChecked()
});
},
handleSubmit: function(){
if (this.isEnabled){
console.log('The shipping plan has been submitted successfully.');
storage.post(this.getUrl(), {
sku: skuModel.sku,
boxConfiguration: ko.toJSON(boxModel.boxConfigurations), 
})
.done(response => console.log('Response has been completed successfully.'))
.fail(err => console.log('Error' + err));
} else {
console.log('The shipping plan has not been submitted successfully.');
}
},
isChecked: function(){
this.isChecked(true);
},
getUrl: function(){
return url.build('inventoryfulfillment/index/post');
},
})
})
