# -*- coding: utf-8 -*-
"""
Created on Sun Mar 24 23:52:10 2019

@author: Andres
"""
from Crypto.Cipher import AES
import base64
import os


def encryptor(privateInfo):
    Block_Size = 32
    Padding = '{'
    
    pd = lambda s: s + (Block_Size - len(s) % Block_Size) * Padding
    
    EncodeAES = lambda c, s: base64.b64encode(c.encrypt(pad(s)))
    
    secret = os.urandom(Block_Size)
    Print('PALABRA para la encriptacion es: '+secret)
    
    cipher = AES.new(secret)
    
    encode = EncodeAES(cipher, privateInfo)
    
    print('PALABRA ENCRIPTADA ES: '+encode)
