<script setup>
import EditTableComponent from "@/components/user/profile/EditTableComponent.vue";
import ShowTableComponent from "@/components/user/profile/ShowTableComponent.vue";
import { ref } from 'vue';

const props = defineProps({ articles: Array });
const emit = defineEmits(['update']);

const editingId = ref(null);

const startEdit = (id) => editingId.value = id;
const handleSave = (article) => {
    emit('update', article);
    editingId.value = null;
};
</script>

<template>
    <div class="mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Текст</th>
                        <th>Дата</th>
                        <th colspan="2">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="article in articles" :key="article.id">
                        <ShowTableComponent
                            v-if="editingId !== article.id"
                            :article="article"
                            @edit="startEdit"
                        />
                        <EditTableComponent
                            v-else
                            :article="article"
                            @save="handleSave"
                            @cancel="editingId = null"
                        />
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
