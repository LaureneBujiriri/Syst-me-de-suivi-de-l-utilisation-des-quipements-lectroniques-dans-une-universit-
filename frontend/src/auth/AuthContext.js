import React, { createContext, useState, useContext } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const AuthContext = createContext(null);

export const AuthProvider = ({ children }) => {
    const navigate = useNavigate();
    const [user, setUser] = useState(JSON.parse(localStorage.getItem('user')) || null);
    const [token, setToken] = useState(localStorage.getItem('token') || null);

    axios.defaults.baseURL = 'http://localhost:8000/api';
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    const login = async (credentials) => {
        try {
            const response = await axios.post('/login', credentials);
            const { user, token } = response.data;
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('token', token);
            setUser(user);
            setToken(token);
            navigate('/profile');
        } catch (error) {
            console.error('Login failed:', error);
        }
    };

    const register = async (userData) => {
        try {
            const response = await axios.post('/register', userData);
            const { user, token } = response.data;
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('token', token);
            setUser(user);
            setToken(token);
            navigate('/profile');
        } catch (error) {
            console.error('Registration failed:', error);
        }
    };

    const logout = () => {
        localStorage.removeItem('user');
        localStorage.removeItem('token');
        setUser(null);
        setToken(null);
        delete axios.defaults.headers.common['Authorization'];
        navigate('/login');
    };

    return (
        <AuthContext.Provider value={{ user, token, login, register, logout }}>
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = () => useContext(AuthContext);
