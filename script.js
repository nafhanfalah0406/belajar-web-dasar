document.addEventListener('DOMContentLoaded', () => {
    // 1. EFEK TYPING PADA JUDUL
    const headerText = document.querySelector('header h1');
    const text = headerText.innerText;
    headerText.innerText = '';
    let i = 0;

    function typeWriter() {
        if (i < text.length) {
            headerText.innerHTML += text.charAt(i);
            i++;
            setTimeout(typeWriter, 100);
        }
    }
    typeWriter();

    // 2. DYNAMIC CURSOR GLOW (Efek Cahaya Mengikuti Mouse)
    document.addEventListener('mousemove', (e) => {
        const x = e.clientX;
        const y = e.clientY;
        
        // Menggerakkan radial gradient di background body
        document.body.style.backgroundAttachment = 'fixed';
        document.body.style.backgroundImage = `
            radial-gradient(at ${x}px ${y}px, rgba(0, 210, 255, 0.25) 0px, transparent 40%),
            radial-gradient(at 100% 100%, rgba(146, 254, 157, 0.1) 0px, transparent 50%),
            linear-gradient(to bottom, #0f172a, #020617)
        `;
    });

    // 3. EFEK TILT PADA KARTU (KARTU MELENGKUNG)
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
            card.style.boxShadow = `${-rotateY * 2}px ${rotateX * 2}px 30px rgba(0, 210, 255, 0.2)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)`;
            card.style.boxShadow = 'none';
        });
    });

    // 4. ANIMASI TOMBOL KIRIM (REACTIVE)
    const form = document.querySelector('form');
    const btn = document.querySelector('button');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        btn.innerHTML = '⚡ TRANSMITTING...';
        btn.style.letterSpacing = '5px';
        
        setTimeout(() => {
            btn.innerHTML = '✅ DATA RECEIVED';
            btn.style.background = 'var(--secondary)';
            form.reset();
            
            setTimeout(() => {
                btn.innerHTML = 'Kirim Sekarang';
                btn.style.background = '';
                btn.style.letterSpacing = '1px';
            }, 3000);
        }, 1500);
    });
});