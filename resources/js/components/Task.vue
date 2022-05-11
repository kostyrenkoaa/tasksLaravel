<template>

    <div class="task">
        <hr>
        <h2>Задача: {{ task.title}}</h2>
        <div>Приоритет: {{ priorities[task.priority_id].title}}</div>
        <div>Статус: {{ task.status}}</div>

        <div v-if="task.tags.length">Теги:
            <span
                v-for="teg in task.tags"
                style="
                font-weight: bold;
                display: inline-block;
                margin-right: 10px;"
            >{{teg}} </span>
        </div>
        <p style="text-align: right">
            <button
                class="btn"
                @click="edit()"
            >Править
            </button>
            <button
                class="btn btn-danger"
                @click="remove()"
            >X
            </button>
        </p>
    </div>
</template>

<script>
    export default {
        props: [
            'task', 'priorities'
        ],
        data() {
            return {}
        },
        methods: {
            remove() {
                this.$emit('delete', this.task.id)
            },
            edit() {
                this.$emit('edit', this.task.id)
            }
        }
    }
</script>

<style>

</style>
