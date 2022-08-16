import TaskList from './components/TaskList.vue';

Vue.component('task-list', TaskList);

var vm = new Vue({
  el: '#app',
});
