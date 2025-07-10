 function afficherHeure() {
        const now = new Date();
        const heures = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const secondes = String(now.getSeconds()).padStart(2, '0');
        document.getElementById("horloge").textContent = `${heures}:${minutes}:${secondes}`;
    }
    setInterval(afficherHeure, 1000);
    afficherHeure();

    function chargerMessages(selectPlaneteId, selectMessageId) {
    const planeteSelect = document.getElementById(selectPlaneteId);
    const messageSelect = document.getElementById(selectMessageId);

    planeteSelect.addEventListener('change', () => {
        const planeteId = planeteSelect.value;
        messageSelect.innerHTML = '<option value="">Chargement...</option>';

        if (planeteId === '') {
            messageSelect.innerHTML = '<option value="">Choisir un message</option>';
            return;
        }

        fetch(`../api/get_messages.php?planete_id=${planeteId}`)
    .then(res => res.json())
    .then(messages => {
        console.log("Messages reçus :", messages);
        messageSelect.innerHTML = '';

        if (!Array.isArray(messages) || messages.length === 0) {
            messageSelect.innerHTML = '<option disabled>Aucun message</option>';
            return;
        }

        messages.forEach(msg => {
            const option = document.createElement('option');
            option.value = msg.id;
            option.textContent = msg.contenu.length > 30 ? msg.contenu.slice(0, 30) + '…' : msg.contenu;
            messageSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error("Erreur lors du fetch :", error);
        messageSelect.innerHTML = '<option disabled>Erreur de chargement</option>';
    });

    });
}

document.addEventListener('DOMContentLoaded', () => {
    chargerMessages('planete-select-modifier', 'message-select-modifier');
    chargerMessages('planete-select-supprimer', 'message-select-supprimer');
});

