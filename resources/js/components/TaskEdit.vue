<template>
    <div class="edit-task-modal">
        <div id="exampleModalLive"
             class="modal fade show"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLiveLabel"
             style="display: block; padding-right: 17px;"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Изменение задачи</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div v-if="msg" class="alert alert-danger" role="alert">
                                    {{msg}}
                                    <button type="button" class="close"  @click="msg" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <p></p>
                                <label>
                                    <b>Название задачи</b>
                                </label>
                                <input type="text"
                                       placeholder="Название задачи"
                                       v-model="task.title"
                                       class="form-control">
                            </div>
                            <div class="col-md-12">
                                <p></p>
                                <label>
                                    <b>Приоритет задачи</b>
                                </label>
                                <select name="" v-model="task.priority_id" class="form-control">
                                    <option value="" disabled>Приоритет задачи</option>
                                    <option v-for="priority in priorities" :value="priority.id">
                                        {{priority.title}} приоритет
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <p></p>
                                <label>
                                    <b>Статус задачи</b>
                                </label>
                                <select name="" v-model="task.status" class="form-control">
                                    <option value="" disabled>Статус задачи</option>
                                    <option v-for="status in statuses" :value="status">
                                        {{status}}
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <p></p>
                                <label>
                                    <b>Теги задачи</b>
                                </label>
                                <input-tag v-model="task.tags"></input-tag>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="close">Отмена</button>
                        <button type="button" class="btn btn-primary" @click="save">Изменить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import InputTag from 'vue-input-tag';

    export default {
        components: {
            'input-tag': InputTag,
        },
        props: [
            'editTask', 'priorities', 'statuses'
        ],
        data() {
            return {
                task: this.getTask(),
                msg: ''
            }
        },
        methods: {
            close(){
                this.$emit('close');
            },
            getTask(){
                return {
                    id: this.editTask.id,
                    priority_id: this.editTask.priority_id,
                    status: this.editTask.status,
                    tags: this.editTask.tags,
                    title: this.editTask.title
                };
            },
            save(){
                if (!this.task.title.length) {
                    this.msg = 'Поле название должно быть заполнено';
                    return;
                }
                this.$emit('save', this.task);
            }
        }
    }
</script>

<style>

</style>
