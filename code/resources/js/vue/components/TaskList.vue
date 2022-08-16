<template>
    <div>
        <p class="red">Task List Component</p>
				<task></task>
    </div>
</template>

<script>
	import Task from './Task.vue';

  export default {
		components: {
      task: Task
    },
    name: 'task-list',
    data () {
      return {
        stored_data: '',
      }
    },
    mounted() {
    },
    created() {
    },
    methods: {
    },
    computed: {
    },
  }
</script>

<style scoped lang="scss">
	.red {
		color: red;
	}
</style>
