import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./views/Home')
	},
	{
		path: '/grid',
		component: require('./views/Grid')
	}
];

export default new VueRouter({
	routes,
	linkActiveClass: 'is-active'
})