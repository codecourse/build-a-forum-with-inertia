import { ref } from 'vue'

const visible = ref(false)

export default () => {
    const showCreateDiscussionForm = () => {
        visible.value = true
    }

    const hideCreateDiscussionForm = () => {
        visible.value = false
    }

    return {
        visible,
        showCreateDiscussionForm,
        hideCreateDiscussionForm
    }
}
