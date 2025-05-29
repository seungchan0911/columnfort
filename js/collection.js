function getIdByParams() {
    const params = new URLSearchParams(window.location.search)
    const idValue = params.get('id')
    return idValue
}

function pushParamsToTitle() {
    const collectionTitle = document.querySelector(".collection-title")
    collectionTitle.textContent = getIdByParams()
}

pushParamsToTitle()