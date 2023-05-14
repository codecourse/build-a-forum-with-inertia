import { ref } from 'vue'
import { MeiliSearch } from 'meilisearch'

const client = new MeiliSearch({
    host: import.meta.env.VITE_MEILISEARCH_HOST,
    apiKey: import.meta.env.VITE_MEILISEARCH_PUBLIC_KEY
})

const mentionSearchResults = ref([])

export default () => {
    const index = client.index('users_mentions')

    const mentionSearch = async (username) => {
        mentionSearchResults.value = (await index.search(username, { limit: 20 })).hits
    }

    return {
        mentionSearch,
        mentionSearchResults
    }
}
