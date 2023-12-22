class SessionManager {

    start(status, client) {
        if (!status || !client || typeof status !== 'object' || typeof client !== 'object') {
            throw new Error('Los datos proporcionados no son válidos');
        }
        const sessionData = {
            status: JSON.stringify(status),
            client: JSON.stringify(client)
        };
        sessionStorage.setItem('sessionData', JSON.stringify(sessionData));
    }

    update(status, client) {
        const sessionData = sessionStorage.getItem('sessionData');
        if (sessionData) {
            const updatedData = {
                status: JSON.stringify(status),
                client: JSON.stringify(client)
            };
            sessionStorage.setItem('sessionData', JSON.stringify(updatedData));
        }
    }
  
    status() {
        const sessionData = sessionStorage.getItem('sessionData');
        if (sessionData) {
            const { status, client } = JSON.parse(sessionData);
            if (status !== undefined && client !== undefined) {
                return { status: JSON.parse(status), client: JSON.parse(client) };
            }
        }
        return false;
    }
  
    static close() {
        sessionStorage.clear();
    }
    
}

const appSession = new SessionManager();