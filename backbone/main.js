var Person=Backbone.Model.extend({
	defaults:{
		name:'griha',
		age:'16'
	},
	walk:function(){
		return this.get('name')+" is walking";
	}
});