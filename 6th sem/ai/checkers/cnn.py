# -*- coding: utf-8 -*-
"""
Created on Sat Mar 30 12:12:04 2019

@author:  S R Navya sree
"""
import numpy
from keras.datasets import mnist
from keras.models import Sequential
from keras.layers import Dense
from keras.layers import Dropout
from keras.layers import Flatten
from keras.layers.convolutional import Conv2D
from keras.layers.convolutional import MaxPooling2D
from keras import backend
backend.set_image_dim_ordering('th')
model = Sequential()
model.add(Conv2D(32, (5, 5), input_shape = (1, 28, 28), ))
model.add(MaxPooling2D(pool_size = (2, 2)))
model.add(Dropout(0.2))
model.add(Flatten())
model.add(Dense(128, ))
model.add(Dense(num_classes, ))
model.compile(loss='mean_squared_error',optimizer='sgd', metrics = ['accuracy'])