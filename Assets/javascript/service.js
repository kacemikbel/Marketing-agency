document.querySelectorAll('.learn-more').forEach(link => {
    link.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const moreInfo = document.getElementById(targetId);
        if (moreInfo.classList.contains('hidden')) {
            moreInfo.classList.remove('hidden');
            this.innerHTML = 'Show Less <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>';
        } else {
            moreInfo.classList.add('hidden');
            this.innerHTML = 'Learn More <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>';
        }
    });
});
