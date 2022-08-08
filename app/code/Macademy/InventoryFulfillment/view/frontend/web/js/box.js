define([
'uiComponent',
'ko',
'Macademy_InventoryFulfillment/js/model/boxModel',
'Macademy_InventoryFulfillment/js/model/skuModel',
'jquery',
], function (Component, ko, boxModel, skuModel, $){
'use strict';

return Component.extend({
defaults: {
boxModel: boxModel.boxConfigurations,
skuModel: skuModel, 
},
initialize: function() {
this._super();
console.log('The box configuration component has been loaded sucessfully.');
skuModel.isSuccess.subscribe((value) => {
console.log('The sku value is ' + value);
});
},
handleAdd() {
boxModel.add();
},
handleDelete(index) {
boxModel.delete(index);
},
handleSubmit() {
if ($('#box form').valid()){
boxModel.isSuccess(true);
console.log('The form is valid.');
} else {
boxModel.isSuccess(false);
console.log('The form is not valid.');
}
},
});
});
