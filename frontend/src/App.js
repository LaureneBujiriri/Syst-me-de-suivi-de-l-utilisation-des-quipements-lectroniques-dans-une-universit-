import React from 'react';
import { BrowserRouter as Router, Route, Routes, Link, Navigate } from 'react-router-dom';
import './App.css';
import Login from './components/auth/Login';
import Register from './components/auth/Register';
import { AuthProvider, useAuth } from './auth/AuthContext';

const Profile = () => {
    const { user, logout } = useAuth();
    return (
        <div>
            <h2>Profil</h2>
            <p>Nom: {user.name}</p>
            <p>Email: {user.email}</p>
            <button onClick={logout}>Déconnexion</button>
        </div>
    );
}

const ProtectedRoute = ({ children }) => {
    const { token } = useAuth();
    return token ? children : <Navigate to="/login" />;
};

const Navigation = () => {
    const { user, logout } = useAuth();

    return (
        <nav>
            <ul>
                {user ? (
                    <>
                        <li>
                            <Link to="/profile">Profil</Link>
                        </li>
                        <li>
                            <button onClick={logout}>Déconnexion</button>
                        </li>
                    </>
                ) : (
                    <>
                        <li>
                            <Link to="/login">Connexion</Link>
                        </li>
                        <li>
                            <Link to="/register">Inscription</Link>
                        </li>
                    </>
                )}
            </ul>
        </nav>
    );
};

function App() {
  return (
    <Router>
        <AuthProvider>
          <div className="App">
            <Navigation />
            <hr />
            <Routes>
              <Route path="/login" element={<Login />} />
              <Route path="/register" element={<Register />} />
              <Route path="/profile" element={<ProtectedRoute><Profile /></ProtectedRoute>} />
            </Routes>
          </div>
        </AuthProvider>
    </Router>
  );
}

export default App;
