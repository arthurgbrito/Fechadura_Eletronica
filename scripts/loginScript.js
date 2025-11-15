
const olho = document.getElementById('olho');
const senha = document.getElementById('ipassword');

olho.addEventListener('click', () => {
    const senhaVisivel = senha.type === 'text';
    senha.type = senhaVisivel ? 'password' : 'text';
    
    olho.classList.toggle('bi-eye-fill', senhaVisivel);
    olho.classList.toggle('bi-eye-slash-fill', !senhaVisivel);
});