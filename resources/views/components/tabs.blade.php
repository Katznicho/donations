<div class="flex justify-between items-center mb-10 mt-10 cursor-pointer">
    <div class="flex space-x-5">
        <h1 id="tab1" class="tab tab-active cursor-pointer font-bold text-lg text-blue-900" onclick="toggleTab('tab1')">Rescue a baby</h1>
        <p id="tab2" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300" onclick="toggleTab('tab2')">Child</p>
        <p id="tab3" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300" onclick="toggleTab('tab3')">Mother</p>
    </div>
</div>

<script>
function toggleTab(tabId) {
    // Remove 'tab-active' class from all tabs and apply styles for inactive tabs
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('tab-active', 'text-blue-900', 'font-bold', 'text-lg');
        tab.classList.add('text-gray-300', 'border-b', 'border-gray-300');
        tab.style.borderBottomColor = 'gray'; // Brown transparent underline for inactive tabs
    });

    // Add 'tab-active' class to the clicked tab and apply styles for active tab
    const clickedTab = document.getElementById(tabId);
    clickedTab.classList.add('tab-active', 'text-blue-900', 'font-bold', 'text-lg');
    clickedTab.style.borderBottomColor = '#3B82F6'; // Blue underline for active tab

    // Hide all tab texts
    document.querySelectorAll('.tab-text').forEach(text => {
        text.classList.add('hidden');
    });

    // Show text below the active tab
    document.getElementById(tabId + 'Text').classList.remove('hidden');

    // Show or hide the cards section based on the tab
    if (tabId === 'tab2' || tabId === 'tab3') {
        document.getElementById('cardsSection').classList.remove('hidden');
    } else {
        document.getElementById('cardsSection').classList.add('hidden');
    }

    // Deactivate other tabs
    const otherTabs = ['tab1', 'tab2', 'tab3'].filter(id => id !== tabId);
    otherTabs.forEach(id => {
        document.getElementById(id).classList.remove('tab-active');
    });
}
</script>



