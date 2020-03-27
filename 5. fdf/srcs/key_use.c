/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   key_use.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/07/05 11:12:28 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:09:25 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static void		key_use3(int key, t_var *try)
{
	if (key == KEY_PAD_7 && try->ptr->bonus->zrot < 500)
	{
		try->ptr->bonus->zrot *= 1.01;
		try->ptr->bonus->ymv += 5;
		try->ptr->bonus->z *= 1.01;
	}
	else if (key == KEY_CLEAR)
		init_win(try);
	else if (key == KEY_PAD_8 && try->ptr->bonus->zrot > 0.6)
	{
		try->ptr->bonus->zrot /= 1.01;
		try->ptr->bonus->ymv -= 5;
		if (try->ptr->bonus->z > 2)
			try->ptr->bonus->z /= 1.01;
	}
	else if (key == KEY_PAD_MULTIPLY && !try->ptr->bonus->extra)
		try->ptr->bonus->extra = 30;
	else if (key == KEY_PAD_MULTIPLY && try->ptr->bonus->extra)
		try->ptr->bonus->extra = 0;
}

static void		key_use2(int key, t_var *try)
{
	if (key == KEY_PAD_2)
		try->ptr->bonus->z += 0.4 + try->ptr->bonus->zrot / 10;
	else if (key == KEY_PAD_1)
		try->ptr->bonus->z -= 0.4 + try->ptr->bonus->zrot / 10;
	else if (key == KEY_UP)
		try->ptr->bonus->ymv -= try->height;
	else if (key == KEY_DOWN)
		try->ptr->bonus->ymv += try->height;
	else if (key == KEY_LEFT)
		try->ptr->bonus->xmv -= try->width;
	else if (key == KEY_RIGHT)
		try->ptr->bonus->xmv += try->width;
	else if (key == KEY_PAD_DIVIDE)
	{
		try->ptr->bonus->iso = !try->ptr->bonus->iso;
		try->ptr->bonus->xmv = 0;
		try->ptr->bonus->ymv = 0;
	}
	else
		key_use3(key, try);
}

static void		key_use(int key, t_var *try)
{
	if (key == KEY_ESCAPE)
		free_err(try, -2, "[ESC close prgm]");
	else if (key == KEY_PAD_ADD)
	{
		try->ptr->bonus->zoom += 1;
		if (try->ptr->bonus->z > 0)
			try->ptr->bonus->z += 0.1;
		try->ptr->bonus->xmv -= try->width / 2 + try->ptr->bonus->zrot;
	}
	else if (key == KEY_PAD_SUB)
	{
		if (try->ptr->bonus->zoom > 0)
		{
			try->ptr->bonus->zoom -= 1;
			try->ptr->bonus->xmv += try->width / 2 + try->ptr->bonus->zrot;
		}
		if (try->ptr->bonus->z > 0.5)
			try->ptr->bonus->z -= 0.1;
	}
	else if (key == KEY_PAD_DOT)
		try->ptr->bonus->debug = !try->ptr->bonus->debug;
	else if (key == KEY_PAD_EQUAL)
		try->ptr->bonus->hud = !try->ptr->bonus->hud;
	else
		key_use2(key, try);
}

int				hook(int key, t_var *try)
{
	key_use(key, try);
	mlx_destroy_image(try->ptr->mlx, try->ptr->img);
	try->ptr->img = mlx_new_image(try->ptr->mlx, WIN_WIDTH, WIN_HEIGHT);
	try->ptr->image = mlx_get_data_addr(try->ptr->img, &(try->ptr->bpp),
						&(try->ptr->s_l), &(try->ptr->endian));
	draw_win(try);
	return (0);
}

int				x_even(t_var *try)
{
	return (free_err(try, -2, "[close button prgm]"));
}
