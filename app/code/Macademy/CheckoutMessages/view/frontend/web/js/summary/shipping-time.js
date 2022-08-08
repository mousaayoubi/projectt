define(['uiComponent'], function(Component){
'use strict';

return Component.extend({
defaults: {
imports: {
'countryId': '${ $.shippingProviderAddress }.country_id'
},
listens: {
'${ $.shippingProviderAddress }.region_id': 'handleRegionId'
},
tracks: {
countryId: true
}
},
initialize: function(){
this._super();
console.log(this.name + " has been initialized.");
},
showMessage: function(){
return this.countryId === 'US';
},
handleRegionId: function(regionId){
console.log("The region id is " + regionId);
}
})
});
