/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   draw_map.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/07/05 11:16:44 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:08:11 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static void		iso(t_line *line, int z)
{
	int		tmp;

	tmp = line->x0;
	line->x0 = (tmp - line->y0) * cos(0.46373398);
	line->y0 = -z + (tmp + line->y0) * sin(0.46373398);
	tmp = line->x1;
	line->x1 = (tmp - line->y1) * cos(0.46373398);
	line->y1 = -z + (tmp + line->y1) * sin(0.46373398);
}

static void		d_line(t_line *line, t_var *try)
{
	t_coord				coord;

	coord_assign(&coord, line);
	while ((coord.e2 > -coord.dx) || (coord.e2 < coord.dy))
	{
		if ((line->x >= WIN_WIDTH && coord.sx == 1) || (line->x < 0
			&& coord.sx == -1) || (line->y >= WIN_HEIGHT && coord.sy == 1)
			|| (line->y < 0 && coord.sy == -1))
			break ;
		write_pixel(line->x, line->y, get_color(line), try);
		if (line->x >= line->x1 && line->y >= line->y1)
			break ;
		coord.e2 = coord.err;
		if (coord.e2 > -coord.dx)
		{
			coord.err -= coord.dy;
			line->x += coord.sx;
		}
		if (coord.e2 < coord.dy)
		{
			coord.err += coord.dx;
			line->y += coord.sy;
		}
	}
}

static void		d_width_line(int i, int j, t_var *try)
{
	t_line	line;

	line.x0 = (WIN_WIDTH / 5) + (i * try->ptr->bonus->zoom)
				+ (j * try->ptr->bonus->zoom) + try->ptr->bonus->xmv;
	line.y0 = (((WIN_WIDTH - (WIN_WIDTH / 3)) + (j * try->ptr->bonus->zoom)) * 1
				/ try->ptr->bonus->zrot) - (((i * try->ptr->bonus->zoom)
				+ (try->ptr->bonus->z * try->stck[0][j][i])) * 1
				/ try->ptr->bonus->zrot) + try->ptr->bonus->ymv
				+ try->ptr->bonus->extra;
	line.start_color = try->stck[1][j][i];
	line.x1 = (WIN_WIDTH / 5) + (i * try->ptr->bonus->zoom) + ((++j)
				* try->ptr->bonus->zoom) + try->ptr->bonus->xmv;
	line.y1 = (((WIN_WIDTH - (WIN_WIDTH / 3)) + ((j) * try->ptr->bonus->zoom))
				* 1 / try->ptr->bonus->zrot) - (((i * try->ptr->bonus->zoom)
				+ (try->ptr->bonus->z * try->stck[0][j][i])) * 1
				/ try->ptr->bonus->zrot) + try->ptr->bonus->ymv
				+ (try->ptr->bonus->extra / 3);
	if (try->ptr->bonus->iso)
		iso(&line, try->ptr->bonus->z);
	if ((line.y0 < 0 && line.y1 < 0) || (line.x0 < 0 && line.x1 < 0)
			|| (line.y0 >= WIN_HEIGHT && line.y1 >= WIN_HEIGHT)
			|| (line.x0 >= WIN_WIDTH && line.x1 >= WIN_WIDTH))
		return ;
	line.end_color = try->stck[1][j][i];
	d_line(&line, try);
}

static void		d_height_line(int i, int j, t_var *try)
{
	t_line	line;

	line.x0 = (WIN_WIDTH / 5) + (i * try->ptr->bonus->zoom)
				+ (j * try->ptr->bonus->zoom) + try->ptr->bonus->xmv;
	line.y0 = (((WIN_WIDTH - (WIN_WIDTH / 3)) + (j * try->ptr->bonus->zoom))
				* 1 / try->ptr->bonus->zrot) - (((i * try->ptr->bonus->zoom)
				+ (try->ptr->bonus->z * try->stck[0][j][i])) * 1
				/ try->ptr->bonus->zrot) + try->ptr->bonus->ymv
				+ try->ptr->bonus->extra;
	line.start_color = try->stck[1][j][i];
	line.x1 = (WIN_WIDTH / 5) + ((++i) * try->ptr->bonus->zoom) + (j
				* try->ptr->bonus->zoom) + try->ptr->bonus->xmv;
	line.y1 = (((WIN_WIDTH - (WIN_WIDTH / 3)) + (j * try->ptr->bonus->zoom))
				* 1 / try->ptr->bonus->zrot) - ((((i) * try->ptr->bonus->zoom)
				+ (try->ptr->bonus->z * try->stck[0][j][i])) * 1
				/ try->ptr->bonus->zrot) + try->ptr->bonus->ymv
				+ (try->ptr->bonus->extra / 3);
	if (try->ptr->bonus->iso)
		iso(&line, try->ptr->bonus->z);
	if ((line.y0 < 0 && line.y1 < 0) || (line.x0 < 0 && line.x1 < 0)
			|| (line.y0 >= WIN_HEIGHT && line.y1 >= WIN_HEIGHT)
			|| (line.x0 >= WIN_WIDTH && line.x1 >= WIN_WIDTH))
		return ;
	line.end_color = try->stck[1][j][i];
	d_line(&line, try);
}

void			draw_map(t_var *try)
{
	try->j = try->width;
	while (try->j > 0)
	{
		--try->j;
		try->i = 0;
		while (try->i < try->height - 1)
		{
			d_width_line(try->j, try->i, try);
			if (try->j < try->width - 1)
				d_height_line(try->j, try->i, try);
			++try->i;
		}
		if (try->j < try->width - 1 && try->i < try->height)
			d_height_line(try->j, try->i, try);
	}
}
