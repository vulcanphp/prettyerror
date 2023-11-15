for (const element of document.querySelectorAll('.trace-btn')) {
    element.addEventListener('click', (event) => {
        event.preventDefault();

        for (const btn of document.querySelectorAll('.trace-btn')) {
            btn.classList.remove('active');
        }

        for (const btn of document.querySelectorAll('.trace-editor')) {
            btn.classList.add('hidden');
        }

        var target = event.target, index = target.getAttribute('href');
        target.classList.add('active');
        
        document.querySelector('.trace-editor[index="'+ index +'"]').classList.remove('hidden');
        document.querySelector('#trace-editor-file').innerHTML = target.getAttribute('file');
    });
}