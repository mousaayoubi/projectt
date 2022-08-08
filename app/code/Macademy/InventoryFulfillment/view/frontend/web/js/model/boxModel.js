define([
'ko',
'Macademy_InventoryFulfillment/js/ko/extenders/numeric',
], function(ko){
'use strict';

const boxConfiguration = () => {

const divisor = 139;

const data = {
unitsPerBox: ko.observable().extend({numeric: true}),
numberOfBoxes: ko.observable().extend({numeric: true}),
boxWeight: ko.observable().extend({numeric: true}),
length: ko.observable().extend({numeric: true}),
width: ko.observable().extend({numeric: true}),
height: ko.observable().extend({numeric: true}),
}

data.dimensionalWeight = ko.computed(() => {
return Math.round((data.length() * data.width() * data.height()) / divisor * data.numberOfBoxes());
});

data.totalWeight = ko.computed(() => {
return Math.round(data.numberOfBoxes() * data.boxWeight());
});

data.billableWeight = ko.computed(() => {
return data.totalWeight() > data.dimensionalWeight() ? data.totalWeight() : data.dimensionalWeight();
});

return data;
};

return {
boxConfigurations: ko.observableArray([boxConfiguration()]),
isSuccess: ko.observable(false),
totalNumberOfBoxes: function(){
return ko.computed(() => {
return this.boxConfigurations().reduce(function(runningTotal, boxConfiguration) {
return runningTotal + (boxConfiguration.numberOfBoxes() || 0);
}, 0);
});
},
totalShipmentWeight: function(){
return ko.computed(() => {
return this.boxConfigurations().reduce(function(runningTotal, boxConfiguration){
return runningTotal + (boxConfiguration.boxWeight() || 0);
}, 0);
});
},
totalBillableWeight: function(){
return ko.computed(() => {
return this.boxConfigurations().reduce(function(runningTotal, boxConfiguration){
return runningTotal + (boxConfiguration.billableWeight() || 0);
}, 0);
});
},
add: function() {
this.boxConfigurations.push(boxConfiguration());
},
delete: function(index) {
this.boxConfigurations.splice(index, 1);
},
}
})
