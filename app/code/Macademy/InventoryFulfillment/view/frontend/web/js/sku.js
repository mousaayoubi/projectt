define([
'uiComponent',
'ko',
'mage/storage',
'jquery',
'mage/translate',
'Macademy_InventoryFulfillment/js/model/skuModel',
], function(Component, ko, storage, $, $t, skuModel){
'use strict';

return Component.extend({
defaults: {
sku:skuModel.sku,
placeholder: 'Example: %1'.replace('%1', '24-MB01'),
message: ko.observable(''),
isSuccess: skuModel.isSuccess,
},
initialize: function() {

this._super();
console.log('The sku component has been loaded successfully.');
},
handleSubmit() {
$("body").trigger('processStart');
console.log(this.sku()+' has been confirmed.');
this.message('');
this.isSuccess(false);

storage.get(`rest/V1/products/${this.sku()}`)
.done(response => {this.message($t('Product found! %1').replace('%1', ` <strong>${response.name}</strong>` ));
this.isSuccess(true);
$("body").trigger('processStop');
})
.fail(() => {this.message($t('Product not found.'));
this.isSuccess(false);
$("body").trigger('processStop');
});
},
})
})
